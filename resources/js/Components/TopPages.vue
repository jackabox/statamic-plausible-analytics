<template>
    <div class="card p-0">
        <h3 class="p-2">Top Pages</h3>

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
