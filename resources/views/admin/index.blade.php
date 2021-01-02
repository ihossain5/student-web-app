<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Admin Dashboard') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">    
                <section class="pt-5">
                  <div class="container">
                      <div class="row">          
                          <div class="col-md-12">
                              <div class="card shadow p-3 mb-5 bg-light ">
                                  <div class="card-header">
                                      <h2>Students Information 
                                          <span class="btn btn-info shadow-lg mb-3 float-end" data-bs-toggle="modal" data-bs-target="#addNewStudentModal"><i class="fas fa-plus"></i> 
                                            Add New
                                          </span>
                                      </h2>                            
                                  </div>
                                  <div class="card-body">
                                    <div class="table-responsive-sm">
                                      <table id="studentTable" class="table ">
                                        <thead>
                                            <tr class="table-info">
                                                <th>Sl No</th>
                                                <th>Name</th>
                                                <th>E-mail</th>
                                                <th>Phone</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody class="table-light">
                                            {{-- <tr>
                                                <td>nsd</td>
                                                <td>nsd</td>
                                                <td>nsd</td>
                                                <td>nsd</td>
                                            </tr> --}}
                                        </tbody>
                                    </table>
                                    </div>
                                      
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
          
            <!-- Add New Student Modal -->
            <div class="modal fade" id="addNewStudentModal" tabindex="-1" aria-labelledby="addNewStudentModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="addNewStudentModalLabel">Add New Student</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>   
                  </div>
                  <div class="modal-body">
                    <form id="studentForm"> @csrf
                        <div class="form-group mb-2">
                            <label for="name">Full Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Enter full name (ex: Ismail Hossain)" 
                                required data-parsley-minlength="6" 
                                data-parsley-pattern="[a-zA-Z ]+$" data-parsley-trigger="keyup"> 
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" 
                                placeholder="Enter valid email address (ex: rahim@gmail.com )" 
                                required data-parsley-type="email" data-parsley-trigger="keyup" >
                        </div>
                        <div class="form-group mb-2">
                            <label for="phone">Phone Number</label>
                            <input type="number" id="phone" name="phone" class="form-control" 
                                placeholder="Enter phone number (ex: 0167126454 )"
                                required data-parsley-length="[11, 14]" data-parsley-trigger="keyup">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Enter password (ex: 1234abcd )" 
                                required data-parsley-length="[8,16]" data-parsley-trigger="keyup" >
                        </div>
                       
                        <div class="d-grid gap-2 pt-4 shadow-lg mb-3 rounded ">
                          <button type="submit" class="btn btn-primary ">Submit</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          
            <!-- Edit Student Modal -->
            <div class="modal fade" id="editStudentModal" tabindex="-1" aria-labelledby="editStudentModallLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="editStudentModalLabel">Update Student Info</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>   
                  </div>
                  <div class="modal-body">
                    <form id="studentEditForm"> @csrf
                      <input type="hidden" id="id">  
                        <div class="form-group mb-2">
                            <label for="name">Full Name</label>
                            <input type="text" id="edit_name" name="name" class="form-control" 
                                placeholder="Enter full name (ex: Ismail Hossain)" 
                                required required data-parsley-minlength="6" 
                                data-parsley-pattern="[a-zA-Z ]+$" data-parsley-trigger="keyup"> 
                        </div>
                        <div class="form-group mb-2">
                            <label for="email">Email</label>
                            <input type="email" id="edit_email" name="email" class="form-control" 
                                placeholder="Enter valid email address (ex: rahim@gmail.com )" 
                                required data-parsley-type="email" data-parsley-trigger="keyup">
                        </div>
                        <div class="form-group mb-2">
                            <label for="phone">Phone Number</label>
                            <input type="number" id="edit_phone" name="phone" class="form-control" 
                              placeholder="Enter phone number (ex: 0167126454 )"
                              required data-parsley-length="[11, 14]" data-parsley-trigger="keyup">
                        </div>
                        <div class="form-group mb-2">
                            <label for="password">Password</label>
                            <input type="password" id="edit_password" name="password" class="form-control" 
                              placeholder="Enter password (ex: 0167126454 )" 
                              required data-parsley-length="[8,16]" data-parsley-trigger="keyup" >
                        </div>
                       
                        <div class="d-grid gap-2 pt-4 shadow-lg mb-3 rounded ">
                          <button type="submit" class="btn btn-primary ">Update</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>

