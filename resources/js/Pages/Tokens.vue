<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import AddToken from "@/Components/AddToken.vue";
import {router} from "@inertiajs/vue3";

const props = defineProps({
    tokens: Array,
})

const deleteToken = (id) => {
    router.delete(route('tokens.destroy', id));
}
</script>

<template>
    <AppLayout>
        <div class="pt-10 flex items-center justify-center">
            <div class="w-full max-w-3xl">
                <Card>
                    <template #title>API tokens</template>

                    <template #content>
                        <div>
                            <div class="overflow-auto max-h-96">
                                <DataTable :value="tokens">
                                    <Column field="name" header="Name" />

                                    <Column field="created_at" header="Created" />

                                    <Column headerStyle="width: 5rem; text-align: center" bodyStyle="text-align: center; overflow: visible">
                                        <template #body="{ data }">
                                            <Button
                                                variant="outlined"
                                                severity="danger"
                                                type="button"
                                                icon="pi pi-trash"
                                                size="small"
                                                @click="deleteToken(data.id)"
                                            />
                                        </template>
                                    </Column>
                                </DataTable>
                            </div>

                            <div class="w-full flex justify-end mt-6">
                                <AddToken />
                            </div>
                        </div>
                    </template>
                </Card>
            </div>
        </div>
    </AppLayout>
</template>
