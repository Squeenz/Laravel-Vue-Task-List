<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TaskDraggable from '@/Components/TaskDraggable.vue';

const props = defineProps({
    completedTasks: Array,
    notCompletedTasks: Array,
})
</script>

<template>
    <Head title="Tasks" />
    <AuthenticatedLayout>
        <div class="m-5 bg-white border border-gray-400 rounded max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
            <Link :href="route('task.create')"><PrimaryButton class="mt-4 mb-4">Create A Task</PrimaryButton></Link>
            <div>
                <TaskDraggable :completedTasks="completedTasks" :notCompletedTasks="notCompletedTasks"/>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
