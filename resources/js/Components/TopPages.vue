<template>
    <div class="p-0 card">
        <h3 class="p-2">Top Pages <span v-if="widget">(Last {{ period }})</span></h3>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Page</th>
                    <th class="text-right">Visitors</th>
                </tr>
            </thead>
            <tbody>
                <tr class="outline-none" v-for="(page, index) in pages" :key="index">
                    <td>{{ page.page }}</td>
                    <td class="text-right">{{ page.visitors }}</td>
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
            pages: []
        }
    },

    mounted() {
        this.fetch()
    },

    methods: {
        async fetch() {
            await fetch(`/cp/plausible/api/top-pages?period=${this.period}`)
                .then(res => res.json())
                .then(res => this.pages = res)
                .catch(err => console.log(err))
        }
    }
}
</script>
