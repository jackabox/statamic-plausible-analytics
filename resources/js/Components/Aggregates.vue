<template>
    <div class="flex justify-between p-0 border-b">
        <div
            v-for="(item, key, index) in data"
            :key="key"
            :class="{ 'border-r': index != getArrayLength }"
            class="w-1/4 p-2 -r last:border-0"
        >
            <h5 class="mb-1 text-xs font-medium uppercase text-grey-70">{{ getKeyTitle(key) }}</h5>
            <p class="text-2xl">
                {{ item.value }}{{ getKeyEnding(key) }}
            </p>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        period: {
            type: String,
            required: true
        },
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
            data: []
        }
    },

    mounted() {
        this.fetch()
    },

    computed: {
        getArrayLength() {
           return Object.keys(this.data).length - 1
        }
    },

    methods: {
        getKeyTitle(key) {
            return key.replace('_', ' ');
        },

        getKeyEnding(key) {
            if (key === 'bounce_rate') {
                return '%'
            }

            if (key === 'visit_duration') {
                return 's'
            }

            return;
        },

        async fetch() {
            await fetch(`/cp/plausible/api/aggregates?period=${this.period}`)
                .then(res => res.json())
                .then(res => this.data = res)
                .catch(err => console.log(err))
        },
    }
}
</script>
