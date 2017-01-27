<template>
    <section>
        <h3 class="page-header">All Notes</h3>
        <ul>
            <li v-for="note in notes">{{ note.name }} - <strong>{{ note.user.name }}</strong></li>
        </ul>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
            Create New Note
        </button>
        <modal>
            <h3 slot="title">Create New Note</h3>
            <p slot="body"><create-note></create-note></p>
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
            axios.get('/note')
                .then(response => this.notes = response.data)
                .catch(error => console.log(error.response.data));
        }
    }
</script>
