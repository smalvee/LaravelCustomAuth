<!DOCTYPE html>
<html>
    <title>Dashboard</title>
    <head></head>
    <body>
        <table class="tablr">
            <thead>
                <th>User ID</th>
                <th>Role</th>
                <th>Action</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{$data->user_id}}</td>
                    <td>{{$data->user_role}}</td>
                    <td><a href="/logout">Logout</a></td>
                </tr>
            </tbody>
        </table>
    </body>
</html>