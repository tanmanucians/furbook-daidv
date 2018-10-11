<div id="cats-table">
    <table class="table table-border">
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Birthday</th>
            <th>Breed name</th>
            <th colspan="2">Action</th>
        </thead>
        <tbody>
            @foreach ($cats as $cat)
            <tr>
                <td>{{$cat->id}}</td>
                <td><a href="{{route('cats.show', $cat->id)}}">{{$cat->name}}</a></td>
                <td>{{$cat->date_of_birth}}</td>
                <td><a href="/cats/breeds/{{$cat->breed->name}}">{{$cat->breed->name}}</a></td>
                <td><a class="btn btn-warning" href="{{route('cats.edit', $cat->id)}}">Edit</a></td>
                <td>
                    <form action="{{route('cats.destroy', $cat->id)}}" method="POST" onsubmit="return confirm('Are you sure?');">
                        <input type="hidden" name="_method" value="DELETE">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div id="pagination" class="text-center">
        {{$cats->links()}}
    </div>

    <script type="application/javascript">
        $(function () {
            $('a.page-link').click(function (e) {
                e.preventDefault();

                var url = $(this).attr('href');
                //console.log(url);
                //$.get(url, function (response) {$('#cats-table').replaceWith(response);});

                $.ajax({
                    method: 'GET',
                    url: url,
                    beforeSend: function(){
                        $('#loading').fadeIn();
                    },
                    success: function(response){
                        $('#cats-table').replaceWith(response);
                    },
                    error: function(err){
                        console.log(err);
                    },
                    complete: function(){
                        $('#loading').fadeOut();
                    }
                });
            });
        });
    </script>
</div>