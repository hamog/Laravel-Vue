<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Create New Note
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create New Note</h4>
                    </div>
                    <div class="modal-body">
                        <p class="alert alert-success" v-if="success" v-text="success"></p>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
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
                success: ''
            }
        },
        methods: {
            createNote: function () {
                let data = this.note;

                axios.post('/note', data)
                    .then(response => this.success = response.data.message)
                    .catch(error => this.errors = error.response.data);

                this.note = { name: '', description: '' };
            },
            clearError: function (field) {
                delete this.errors[field];
            }
        }
    }
</script>