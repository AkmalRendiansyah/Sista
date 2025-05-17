<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Design by foolishdeveloper.com -->
    <title>Glassmorphism login Form Tutorial in html css</title>
 

</head>
<body>
    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    
    <form action="{{ route('register_proses') }}" method="POST">
        @csrf
        <h3>Register</h3>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $item)
                <li>{{ $item }} </li>
                @endforeach
            </ul>
        </div>
        @endif
        <label for="username">username</label>
        <input type="username" placeholder="username" id="username" name="name" value ="{{ old('name') }}">
        <label for="email">email</label>
        <input type="email" placeholder="alamat email" id="email" name="email" value ="{{ old('email') }}">
        <label for="password">Password</label>
        <input type="password" placeholder="Password" id="password" name="password">
        <div class="form-group">
            <select name="role">
                <option value="">Pilih role:</option>
                <option value="admin" >Admin</option>
                <option value="kaprodi">Kaprodi</option>
                <option value="dosen">Dosen</option>
                <option value="mahasiswa">Mahasiswa</option>
            </select>
        <button>Submit</button>
        <a href="{{ route('login') }}" class="text-center">login</a>
        
       
        
    </form>
</body>
</html>
