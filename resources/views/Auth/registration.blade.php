<!DOCTYPE html>
<html>
<title></title>

<body>

    <form action="{{route('reg_user')}}" method="POST">
        @if(Session::has('success'))
        <div class="">{{Session::get('success')}}</div>
        @endif
        @if(Session::has('fail'))
        <div class="">{{Session::get('fail')}}</div>
        @endif
        @csrf
        <label>Enter user ID</label>
        <input type="text" name="user_id" required>
        <br>
        <label>Enter user Password</label>
        <input type="password" name="password" required>
        <br>
        <label>Enter user Role</label>
        <input type="text" name="user_role" required>
        <br>
        <button type="submit">Submit</button>

    </form>

</body>

</html>