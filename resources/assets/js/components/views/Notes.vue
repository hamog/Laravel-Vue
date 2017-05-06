<template>
    <section>
        <h3 class="page-header">All Notes</h3>
        <ul v-if="notes">
            <li v-for="(note, index) in notes">
                {{ note.name }} - <strong>{{ note.user.name }}</strong>

                <a :href="'/note/' + note.id" @click.prevent="deleteNote(note.id, index)" data-toggle="tooltip" data-placement="right" title="Delete Note">
                    <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                </a>
            </li>
        </ul>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Create New Note
        </button>
        <modal>
            <h3 slot="title">Create New Note</h3>
            <p slot="body">
                <create-note></create-note>
            </p>
        </modal>
    </section>
</template>

<script>
    export default {
        data: function () {
            return {
                notes: []
            }
        },
        created: function () {
            this.getNotes();
        },
        methods: {
            getNotes: function () {
                axios.get('/note')
                    .then(response => this.notes = response.data)
                    .catch(error => console.log(error.response.data));
            },

            deleteNote: function (id, idx) {
              swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this note!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    closeOnConfirm: false
                },
                function(){
                    axios.delete('/note/' + id)
                        .then(response => swal("Deleted!", response.data.msg, "success"))
                        .catch(error => console.log(error.response.data));
                });
                //Update notes
                this.notes.splice(idx, 1);
            }
        }
    }
</script>
