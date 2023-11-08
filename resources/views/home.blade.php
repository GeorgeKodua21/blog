<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @auth
        <p>Congrats you are logged in</p>
        <form action="/logout" method="POST">
         @csrf
        <button>Logout</button>
        </form>

    <div style="border: 3px solid black;">
        <h2>Create new post</h2>
        <form action="/create-post" method="POST">
            @csrf
            <div>
                <input type="text" name="title" placeholder="title">
            </div>
            <div>
                <textarea name="body" placeholder="body content"></textarea>
            </div>
            <div>
                <button>Save Post</button>
            </div>    
        </form>
    </div> 
    <div style="border: 3px solid black;">
        <h2>All Posts</h2>
        @foreach($posts as $post)
        <div style="background-color: gray; padding: 10px; margin: 10px;">
            <h3>{{$post['title']}}</h3>
            {{$post['body']}};
            <P><a href="/edit-post/{{$post->id}}">Edit</a></P>
            <form action="/delete-post/{{$post->id}}" method="POST">
            @csrf
            @method('DELETE')
            <button>Delete</button>
        </form>
        </div>
        @endforeach
    </div> 
    @else
    <div style="border: 3px solid black;">
        <h2>Register</h2>
        <form action="/register" method="POST">
        @csrf
        <div>
            <input type="text" name="name" placeholder="name">
        </div>
        <div>
            <input type="text" name="email" placeholder="email">
        </div>
        <div>
            <input type="password" name="password" placeholder="password">
        </div>
        <div>
            <button>Register</button>
        </div>
    </form>
    </div>
    <div style="border: 3px solid black;">
        <h2>Login</h2>
        <form action="/login" method="POST">
        @csrf
        <div>
            <input type="text" name="username" placeholder="name">
        </div>
        <div>
            <input type="password" name="userpassword" placeholder="password">
        </div>
        <div>
            <button>Login</button>
        </div>
    </form>
    </div>
    @endauth
    
</body>
</html>