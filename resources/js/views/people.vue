<script setup>
import {ref} from "vue";
import {refDebounced, useFetch} from '@vueuse/core'

const searchQuery = ref('')
const debouncedSearchQuery = refDebounced(searchQuery, 1000)

// Data table options
const itemsPerPage = ref(10)
const page = ref(1)

const url = computed(() => {
    const base = 'api/people'

    const params = new URLSearchParams({
        search: debouncedSearchQuery.value,
        itemsPerPage: itemsPerPage.value === -1 ? itemsLength.value : itemsPerPage.value,
        page: page.value,
    })

    console.log(params.toString())

    return base + '?' + params.toString()
})

const {
    data: response,
    execute: fetchPeople,
    isFetching,
} = useFetch(url, { refetch: true })

const data = computed(() => {
    return JSON.parse(response.value)
})

const items = computed(() => {
    return data.value?.results
})

const itemsLength = computed(() => {
    return data.value?.count
})

const headers = [
    {
        title: 'Name',
        key: 'name',
    },
]
</script>

<template>
    <VRow>
        <VCol cols="12">
            <VCard id="invoice-list">
                <VCardText class="d-flex align-center flex-wrap gap-4">
                    <div class="me-3 d-flex gap-3 align-center">

                    </div>

                    <VSpacer />

                    <div class="d-flex align-center flex-wrap gap-4">
                        <!-- 👉 Search  -->
                        <div class="invoice-list-filter">
                            <VTextField
                                v-model="searchQuery"
                                placeholder="Search Invoice"
                                density="compact"
                                style="min-width: 300px"
                            />
                        </div>
                    </div>
                </VCardText>
                <VDivider />

                <VDataTableServer
                    v-model:page="page"
                    :items="items"
                    :headers="headers"
                    :loading="isFetching"
                    :items-per-page="itemsPerPage"
                    :items-length="itemsLength"
                >
                    <template #bottom>
                        <VPagination
                            v-model="page"
                            :length="Math.ceil(itemsLength / itemsPerPage)"
                            :total-visible="$vuetify.display.xs ? 1 : Math.ceil(itemsLength / itemsPerPage)"
                        />
                    </template>
                </VDataTableServer>
            </VCard>
        </VCol>
    </VRow>
</template>

<style scoped>

</style>