<script setup>
import { Head } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
</script>

<template>
    <Head title="Tasks" />
    <AuthenticatedLayout>
        <div class="m-5 bg-white border border-gray-400 rounded max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <a :href="route('task.create')"><PrimaryButton class="mt-4 mb-4">Create A Task</PrimaryButton></a>

            <h1>List of tasks</h1>
            <div class="m-5 bg-white border border-gray-400 rounded max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
                <h1>Task 1</h1>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
