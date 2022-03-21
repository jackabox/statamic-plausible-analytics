<template>
    <div class="p-0 mb-4 card">
        <h3 v-if="widget" class="p-2">Analytics (Last {{ period }})</h3>

        <Aggregates :period="period" />

        <div v-if="showGraph">
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
        },
        widget: {
            type: Boolean,
            required: false,
            default: false
        },
        showGraph: {
            type: Boolean,
            required: false,
            default: true
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
