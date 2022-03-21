<template>
    <div class="p-0 card">
        <h3 class="p-2">Top Referrers <span v-if="widget">(Last {{ period }})</span></h3>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Referrer</th>
                    <th class="text-right">Visitors</th>
                </tr>
            </thead>
            <tbody>
                <tr class="outline-none" v-for="(referrer, index) in referrers" :key="index">
                    <td class="text-sm">{{ referrer.source ? referrer.source : 'Other/Direct' }}</td>
                    <td class="text-right">{{ referrer.visitors }}</td>
                </tr>
            </tbody>

        </table>
    </div>
</template>

<script>
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

    data() {
        return {
            error: null,
            referrers: []
        }
    },

    mounted() {
        this.fetch()
    },

    methods: {
        async fetch() {
            await fetch(`/cp/plausible/api/top-referrers?period=${this.period}`)
                .then(res => res.json())
                .then(res => this.referrers = res)
                .catch(err => console.log(err))
        }
    },
}
</script>
