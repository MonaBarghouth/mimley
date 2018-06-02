<template>
    <div>
        <h2>Users Listing</h2>
        <a href="/users/create"  class="btn btn-success pull-right">Add New User</a>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Adam</td>
                <td>Adam</td>
                <td>adam@gmail.com</td>
                <td><a href="" class="btn btn-primary">Edit</a>||
                    <a href="" class="btn btn-primary">Edit</a> </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        name: "users.veu"
    }
</script>

<style scoped>

</style>