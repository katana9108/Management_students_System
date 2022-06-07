 <!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Management System School' }}</title>
    <link rel="stylesheet" type="text/css" href="{!! include ('css/style.css') !!}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="/docs/5.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">


  </head>
  <body>
      <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="#">Home</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Students List</a>
                  </li>
                </ul>
                <form class="d-flex" role="search">
                  <input class="form-control me-2" type="search" placeholder="Search student" aria-label="Search">
                  <button class="btn btn-outline-success" type="submit">Search </button>
                </form>
              </div>
            </div>
          </nav>
      </header>
      <main>
          <div class="container">
              <div class="row">
                  <div class="col-md-8">
                    <table class="table table-striped">
                        <div class="container mb-5">
                            <img src="{{asset('imgs/student-management-banner-1920x1080-1-1024x576.png')}}" class="img-responsive w-100 h-100" alt="student list" style="border-radius:20px;" >
                        </div>
                        <thead class="" ">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">CNE</th>
                                <th scope="col">Formation</th>
                                <th scope="col">Date of Birth</th>
                                <th scope="col">Actions</th>
                              </tr>
                        </thead>
                        @foreach ($students as $student)
                        <tbody>

                            <tr>
                                <th scope="row">{{ $student->id }}</th>
                                <td>{{Str::limit( $student->first_name,5 )}}</td>
                                <td>{{Str::limit( $student->last_name,5 )}}</td>
                                <td>{{Str::limit($student->email ,8)}}</td>
                                <td>{{$student->cne }}</td>
                                <td>{{Str::limit($student->formation,8)}}</td>
                                <td>{{$student->age}}</td>
                                <td>
                                    <a href="{{route('students.edit',$student->id)}}" class="btn btn-primary">Edit</a>
                                    <a href="#"class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal{{$student->id}}" >Delete</a>
                                </td>
                              </tr>
                        </tbody>
                        <div class="modal fade" id="exampleModal{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                  <form action="{{route('students.destroy',$student->id)}}" method="post">
                                    @csrf
                                    @method('put')
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Confirm deletion</h5>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Do you really want to delete ? : {{$student->first_name}}
                                </div>
                                <div class="modal-footer">
                                  <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-danger">Confirm</button>
                                </div>
                              </div>
                            </form>

                            </div>
                          </div>
                        @endforeach

                    </table>

                  </div>
                  <div class="col-md-4 bg-danger">
                      <div class="create py-3 mt-2">
                          <h2>
                              Create Students
                          </h2>
                      </div>
                      <div>
                          <img src="{{asset('imgs/school-management-system-500x500.jpg')}}"  class="img-responsive w-100 h-100" alt="management students" style="border-radius:10px;">
                      </div>
                      <form action="{{route('students.store')}}" class="form-horizontal mt-3" method='post' >
                        @csrf
                          <div class="form-group ">
                              <label for="first_name">First Name</label>
                              <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" required focus value="{{$student->first_name}}" >
                          </div>

                          <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" required focus value="{{$student->last_name}}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Email" required focus value="{{$student->email}}">
                        </div>

                        <div class="form-group">
                            <label for="cne">CNE</label>
                            <input type="text" name="cne" id="cne" class="form-control" placeholder="CNE" required focus value="{{$student->cne}}">
                        </div>

                        <div class="form-group">
                            <label for="age">Birth year</label>
                            <input type="text" name="age" id="age" class="form-control" placeholder="year of birth " required focus value="{{$student->age}}">
                            {{-- <input type="hidden" name="user_id" value="{{$users->id}}"> --}}
                        </div>

                        <div class="form-group">
                            <label for="formation">Formation</label>
                            <input type="text" name="formation" id="formation" class="form-control" placeholder="Formation " required focus value="{{$student->formation}}">
                        </div>

                        <div class="form-group  py-3 " >
                            <button class="btn btn-success w-100">Submit</button>
                        </div>

                      </form>

                  </div>
              </div>

          </div>
      </main>
      <!-- Button trigger modal -->

  <!-- Modal -->




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  </body>
</html>
