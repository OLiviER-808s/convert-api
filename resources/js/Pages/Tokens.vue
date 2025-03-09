<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import AddToken from "@/Components/AddToken.vue";
</script>

<template>
    <AppLayout>
        <div class="pt-10 flex items-center justify-center">
            <Card>
                <template #title>API tokens</template>

                <template #content>
                    <div class="flex flex-col gap-2">
                        <div class="flex items-end">
                            <AddToken />
                        </div>
                    </div>
                </template>
            </Card>
        </div>
    </AppLayout>
</template>
