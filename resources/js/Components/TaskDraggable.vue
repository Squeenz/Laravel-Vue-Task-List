<script setup>
import draggable from 'vuedraggable';
import { router } from '@inertiajs/vue3';

const props = defineProps({
    completedTasks: {
        type: Array
    },
    uncompletedTasks: {
        type: Array
    }
});

let completedTasksNew = props.completedTasks;
let uncompletedTasksNew = props.uncompletedTasks;

const onAdd = (event, completed) => {
    let id = event.item.getAttribute('data-id');
    router
        .patch(`/tasks/${id}`, {
            completed: completed
        })
        .then((response) => {
            console.log(response.data)
        })
        .catch((error) => {
            console.log(error)
        })
}

const update = () => {
    uncompletedTasksNew = uncompletedTasksNew.map((task, index) => {
        task.order = index + 1
        return task
    })

    completedTasksNew = completedTasksNew.map((task, index) => {
        task.order = index + 1
        return task
    })

    let tasks = uncompletedTasksNew.concat(completedTasksNew)

    router
        .patch(`/tasks/update`, {
            tasks: tasks
        })
        .then((response) => {
            console.log(response.data)
        })
        .catch((error) => {
            console.log(error)
        })
}

</script>

<template>
    <div class="row">
        <div class="col-md-4 col-md-offset-2">
            <section class="list">
                <header>UPCOMING</header>
                <draggable
                    v-model="uncompletedTasksNew"
                    class="drag-area"
                    tag="article"
                    item-key="id">
                    <template #item="{ element }">
                        <h1> {{ element.title }}</h1>
                    </template>
                </draggable>
            </section>
        </div>
        <div class="col-md-4">
            <section class="list">
                <header>COMPLETED</header>
                <draggable
                    v-model="completedTasksNew"
                    class="drag-area"
                    tag="article"
                    item-key="id">
                    <template #item="{ element }">
                        <h1> {{ element.title }}</h1>
                    </template>
                </draggable>
            </section>
        </div>
    </div>
</template>

<style>
    .drag-area{
     min-height: 10px;
    }
</style>
