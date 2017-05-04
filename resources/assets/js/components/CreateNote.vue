<template>
    <div>
        <alert type="success" message="Note Created." v-if="success"></alert>
        <form action="/note" method="post" @submit.prevent="createNote" @keydown="clearError($event.target.name)">
            <div :class="['form-group', errors.name ? 'has-error' : '']">
                <label for="name">Note Name</label>
                <input type="text" name="name" id="name" class="form-control" v-model="note.name">

                <span class="help text-danger" v-if="errors.name">{{ errors.name[0] }}</span>
            </div>
            <div :class="['form-group', errors.description ? 'has-error' : '']">
                <label for="description">Note Description</label>
                <textarea name="description" id="description" class="form-control" v-model="note.description"></textarea>

                <span class="help text-danger" v-if="errors.description">{{ errors.description[0] }}</span>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                note: {
                    name: '',
                    description: ''
                },
                errors: [],
                success: false
            }
        },
        methods: {
            createNote: function () {
                this.success = false;
                let data = this.note;

                axios.post('/note', data)
                    .then(response => this.onSuccess(response.data))
                    .catch(error => this.onFail(error.response.data));

            },
            clearError: function (field) {
                delete this.errors[field];
            },
            onSuccess: function (data) {
                if (data.success) {
                    this.success = true;
                }
                this.note = { name: '', description: '' };
            },
            onFail: function (error) {
                this.errors = error;
            }
        }
    }
</script>
