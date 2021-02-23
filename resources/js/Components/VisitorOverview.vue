<template>
    <div class="card p-0 mb-4">
        <Aggregates :period="period" />

        <vue-frappe
            id="test"
            :lineOptions="options"
            type="line"
            :height="300"
            :colors="getGraphColor"
            :labels="labels"
            :dataSets="series">
        </vue-frappe>
    </div>
</template>

<script>
import { VueFrappe } from 'vue2-frappe'
import Aggregates from './Aggregates'

export default {
    props: {
        period: {
            type: String,
            required: true
        }
    },

    watch: {
        $props: {
            handler() {
                this.fetch()
            },
            deep: true,
            immediate: true
        }
    },

    components: {
        VueFrappe,
        Aggregates
    },

    data() {
        return {
            options: {
                height: 500,
                regionFill: 1
            },
            series: [{
                name: "Visitors",
                data: []
            }]
        }
    },

    mounted() {
        this.fetch()
    },

    methods: {
        async fetch() {
            await fetch(`/cp/plausible/api/timeseries?period=${this.period}`)
                .then(res => res.json())
                .then(({ labels, series }) => {
                    this.labels = labels
                    this.series = [{
                        name: 'Visitors',
                        values: series
                    }]
                })
                .catch(err => console.log(err))
        },
    }
}
</script>
