<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import ListOfTasks from '@/Components/ListOfTasks.vue';

const props = defineProps(['tasks'])

</script>

<template>
    <Head title="Tasks" />
    <AuthenticatedLayout>
        <div class="m-5 bg-white border border-gray-400 rounded max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <Link :href="route('task.create')"><PrimaryButton class="mt-4 mb-4">Create A Task</PrimaryButton></Link>

            <h1>List of tasks</h1>
            <div class="grid grid-rows-2 grid-flow-col gap-4 justify-center">
                <ListOfTasks :tasks="tasks"/>
            </div>

        </div>
    </AuthenticatedLayout>
</template>
