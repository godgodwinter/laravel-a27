
    <!-- DOM/Jquery table start -->
    <div class="card">
        <div id="container">
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-styling">
                        <thead>
                            <tr class="table-primary">
                                <th>#</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($suppliers as $supplier)
                            <tr>
                                <td>{{ ($loop->index)+1 }} </td>
                                <td>{{$supplier->nama}}</td>
                            <td>{{$supplier->email}}</td>
                            <td> <button class="btn btn-warning btn-outline-warning"
                            href="/pencarian/add/{{$supplier->id}}" id="{{$supplier->id}}"><span class="pcoded-micon"> <i
                                        class="feather icon-edit"></i>Pilih</span></button></td>
                            </tr>

                    
                            <script>
                                $(document).ready(function() {
                                var container2 = document.getElementById("container2");
                                $("#{{$supplier->id}}").on('click', function() {
                                //   alert('ok' + this.id);
                                $('#container2').load('pencarian/add/a');
                               
                                });
                               });
                             </script>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- DOM/Jquery table end -->
