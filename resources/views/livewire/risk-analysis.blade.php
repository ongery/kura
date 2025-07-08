<div>
    <table class="table table-bordered table-hover table-sm">
        <thead class="thead-light">
            <tr>
                <th>Reference</th>
                <th>Main Risk Event</th>
                <th>I.C</th>
                <th>I.L</th>
                <th>I.R</th>
                <th>C.C</th>
                <th>C.L</th>
                <th>C.R</th>
                <th>R.C</th>
                <th>R.L</th>
                <th>R.R</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $val)
            <tr>
                <td>EDK</td>
                <td>Testing Risk</td>
                <td>5</td>
                <td>3</td>
                <td>5</td>
                <td>2</td>
                <td>3</td>
                <td>5</td>
                <td>2</td>
                <td>2</td>
                <td>2</td>
                <td>
                    <a href="#"> <i class="fa fa-edit blue"></i></a>
                    <a href=""> <i class="fa fa-trash red"></i></a>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
