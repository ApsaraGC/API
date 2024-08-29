<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Doctor</title>
</head>

<body>

    <h1>Doctor</h1>

    <!---display success message-->
    <button>

        @if (session('success'))
            <div style="color:green">
                {{ session('success') }}
            </div>
        @endif
    </button>

    <br> <br>


    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Position</th>
                <th>Gender</th>
                <th>Shift</th>
                <th>Image</th>
                <th>Experience</th>
                <th>Number</th>
                <th>Button</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->position }}</td>
                    <td>{{ $doctor->gender }}</td>
                    <td>{{ $doctor->shift }}</td>
                    <td><img src="images_doctor/{{ $doctor->image }}" alt="" height="50px" width="50px"></td>
                    <td>{{ $doctor->experience }}</td>
                    <td>{{$doctor->phone_number}}</td>



                    <td>
                       {{-- <button style="background-color: pink">
                        <!-- <a style="color: white" href="">View</a> -->
                              <a  href="{{ route('doctor.show', $doctor->id) }}">View</a>
                        </button>
                        <button style="background-color: lightblue;" >
                        <!-- <a style="color: white" href="">Edit</a> -->
                             <a style="color: white" href="{{ route('doctor.edit', $doctor->id) }}">Edit</a>
                        </button>
                         <!-- Delete Button with Confirmation -->
                         <form action="{{ route('doctor.destroy', $doctor->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this doctor?');">Delete</button>
                        </form>

                      <button style="background-color: red;" >

                            <a style="color: white" href="{{route('doctor.destory',$doctor->id)}}" method="POST">Delete</a>
                        </button> --}}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7">No doctor found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    <br>
        <a href="{{ route('doctor.create')}}" class="btn btn-primary">Add New doctor</a>
</body>

</html>

