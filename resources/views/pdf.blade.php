<br/>
<div class="container">
    <h3 align="center">{{$data['header']}}</h3><br/>
    <br/>
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Номер</th>
                <th>Назва</th>
                <th>Вага</th>
                <th>Кількість</th>
                <th>Ціна</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data['content'] as $k => $v)
            <tr>
                <td>{{$k+1}}</td>
                <td>{{$v->name}}</td>
                <td>{{$v->weight}}</td>
                <td>1</td>
                <td>{{$v->price}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
