<!-- Main content -->
<section class="content">
    <div class="card-body">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Covid 19 Records</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="float-sm-right">
                    <div class="btn-group">
                        <button type="button" id="AddRow" data-toggle="modal" data-target="#exampleModal" class="btn btn-success" onclick="clearform()">Add Record</button>
                    </div>
                </ol>
            </div><!-- /.col -->
        </div>

        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Mobileno</th>
                    <th>Temp</th>
                    <th>Covid19diagnosed</th>
                    <th>Covid19encountered</th>
                    <th>Vaccinated</th>
                    <th>Nationality</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>

        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Covid Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="clearform()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="profile">
                            <input name="id" type="hidden" class="form-control" id="id">
                            <div class="form-group">
                                <label for="name" class="col-form-label">NAME:</label>
                                <input name="name" type="text" class="form-control" id="name">
                            </div>
                            <div class="form-group">
                                <label for="gender" class="col-form-label">GENDER:</label>
                                <select class="form-control" id="gender" name="gender">
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="age" class="col-form-label">AGE:</label>
                                <input name="age" type="number" class="form-control" id="age">
                            </div>
                            <div class="form-group">
                                <label for="mobileno" class="col-form-label">MOBILE NO:</label>
                                <input name="mobileno" type="number" class="form-control" id="mobileno" placeholder="09061234567">
                            </div>
                            <div class="form-group">
                                <label for="temp" class="col-form-label">BODY TEMP:</label>
                                <input name="temp" type="number" class="form-control" id="temp">
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="covid19diagnosed" name="covid19diagnosed">
                                    <label for="covid19diagnosed" class="form-check-label">COVID 19 DIAGNOSED</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="covid19encountered" name="covid19encountered">
                                    <label for="covid19encountered" class="form-check-label">COVID 19 ENCOUNTERED</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="vaccinated" name="vaccinated">
                                    <label for="vaccinated" class="form-check-label">VACCINATED</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nationality" class="col-form-label">NATIONALITY:</label>
                                <input name="nationality" type="text" class="form-control" id="nationality">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-delete">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Rercord</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="deletemessage">You are about to delete this record.</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" id="deleteRecord">Delete</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
</section>
<script>
    $(function() {
       
        var table = $("#example1").DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: window.location.pathname +'api/read.php',
                type: 'POST',
            },
            columns: [{
                    data: 'id'
                },
                {
                    data: 'name'
                },
                {
                    data: 'gender'
                },
                {
                    data: 'age'
                },
                {
                    data: 'mobileno'
                },
                {
                    data: 'temp'
                },
                {
                    data: 'covid19diagnosed'
                },
                {
                    data: 'covid19encountered'
                },
                {
                    data: 'vaccinated'
                },
                {
                    data: 'nationality'
                },
                {
                    data: null,
                    defaultContent: `<td>
                                        <button type="button" id="editRow" class="btn btn-warning" >Edit</button>
                                        <button type="button" id="deleteRow" class="btn btn-danger" >Delete</button>
                                    </td>`
                }
            ],
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": false,
            "info": true,
            "autoWidth": false,
            "responsive": true,
            "lengthMenu": [5, 10, 20, 50, 100]
        });


        $('body').on('click', '#editRow', function() {
            var row = $(this).parents('tr')[0];

            $("#exampleModalLabel").text("Edit Covid Profile");
            $('#exampleModal').modal('show');
            $("#id").val(table.row(row).data().id);
            $("#name").val(table.row(row).data().name);
            $("#gender").val(table.row(row).data().gender);
            $("#age").val(table.row(row).data().age);
            $("#mobileno").val(table.row(row).data().mobileno);
            $("#temp").val(table.row(row).data().temp);
            $("#covid19diagnosed").attr("checked", table.row(row).data().covid19diagnosed == "YES" ? true : false);
            $("#covid19encountered").attr("checked", table.row(row).data().covid19encountered == "YES" ? true : false);
            $("#vaccinated").attr("checked", table.row(row).data().vaccinated == "YES" ? true : false);
            $("#nationality").val(table.row(row).data().nationality);
        });

        $('body').on('click', '#deleteRow', function() {
            var row = $(this).parents('tr')[0];
            // table.row(row).data().id
            $('#modal-delete').modal('show');
            $('#deletemessage').text(`You are about to delete covid record for ${table.row(row).data().name} .`);
            $("#deleteRecord").attr("onclick", `deleterecord(${table.row(row).data().id})`)
        });



        $("form").on("submit", function(event) {
            event.preventDefault();
            let formdata = $(this).serializeArray();

            var data = {};
            $(formdata).each(function(index, obj) {
                data[obj.name] = obj.value;
            });

            data.covid19diagnosed = data.covid19diagnosed == "on" ? "YES" : "NO";
            data.covid19encountered = data.covid19encountered == "on" ? "YES" : "NO";
            data.vaccinated = data.vaccinated == "on" ? "YES" : "NO";

            if (!data.id) {
                $.ajax({
                    method: "POST",
                    url: window.location.pathname +"api/create.php",
                    data: data,
                    success: function(data, textStatus, jqXHR) {
                        console.log(textStatus + ": " + jqXHR.status);
                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'Success',
                            body: 'Success creating covid 19 profile.',
                            autohide: true,
                            delay: 5000,
                        })
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus + ": " + jqXHR.status + " " + errorThrown);
                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'Error',
                            body: 'Error creating covid 19 profile.',
                            autohide: true,
                            delay: 5000,
                        })
                    }
                });
            } else {
                $.ajax({
                    method: "POST",
                    url: window.location.pathname +"api/update.php",
                    data: data,
                    success: function(data, textStatus, jqXHR) {
                        console.log(textStatus + ": " + jqXHR.status);
                        $(document).Toasts('create', {
                            class: 'bg-success',
                            title: 'Success',
                            body: 'Success updating covid 19 profile.',
                            autohide: true,
                            delay: 5000,
                        })
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus + ": " + jqXHR.status + " " + errorThrown);
                        $(document).Toasts('create', {
                            class: 'bg-danger',
                            title: 'Error',
                            body: 'Error updating covid 19 profile.',
                            autohide: true,
                            delay: 5000,
                        })
                    }
                });
            }
            table.ajax.reload();
            clearform();
            $('#exampleModal').modal('hide');

        });

        
    });

    function deleterecord(id) {
            $.ajax({
                method: "POST",
                url: window.location.pathname +"api/delete.php",
                data: {
                    id: id
                },
                success: function(data, textStatus, jqXHR) {
                    console.log(textStatus + ": " + jqXHR.status);
                    $(document).Toasts('create', {
                        class: 'bg-success',
                        title: 'Success',
                        body: 'Success deleting covid 19 profile.',
                        autohide: true,
                        delay: 5000,
                    })
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus + ": " + jqXHR.status + " " + errorThrown);
                    $(document).Toasts('create', {
                        class: 'bg-danger',
                        title: 'Error',
                        body: 'Error deleting covid 19 profile.',
                        autohide: true,
                        delay: 5000,
                    })
                }
            });
            $("#example1").DataTable().ajax.reload();
            $('#modal-delete').modal('hide');
        }

        function clearform() {
            $("#id").val("");
            $("#name").val("");
            $("#gender").val("");
            $("#age").val("");
            $("#mobileno").val("");
            $("#temp").val("");
            $("#covid19diagnosed").attr("checked", false);
            $("#covid19encountered").attr("checked", false);
            $("#vaccinated").attr("checked", false);
            $("#nationality").val("");
        }
        

</script>