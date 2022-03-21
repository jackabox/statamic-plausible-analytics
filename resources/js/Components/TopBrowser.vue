<template>
    <div class="p-0 card">
        <h3 class="p-2">Top Browsers <span v-if="widget">(Last {{ period }})</span></h3>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Browser</th>
                    <th class="text-right">Visitors</th>
                </tr>
            </thead>
            <tbody>
                <tr class="outline-none" v-for="(item, index) in items" :key="index">
                    <td class="text-sm">{{ item.browser }}</td>
                    <td class="text-right">{{ item.visitors }}</td>
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
            items: []
        }
    },

    mounted() {
        this.fetch()
    },

    methods: {
        async fetch() {
            await fetch(`/cp/plausible/api/top-browsers?period=${this.period}`)
                .then(res => res.json())
                .then(res => this.items = res)
                .catch(err => console.log(err))
        }
    }
}
</script>
