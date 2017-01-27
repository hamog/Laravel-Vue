<template>
    <section>
        <h3 class="page-header">All Notes</h3>
        <ul>
            <li v-for="note in notes">{{ note.name }} - <strong>{{ note.user.name }}</strong></li>
        </ul>
        <modal></modal>
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
