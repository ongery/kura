<ul>

    @foreach($childs as $child)

    <li>

        {{ $child->Name }}

        @if(count($child->childs))

        @include('category.manageChild',['childs' => $child->childs])

        @endif

    </li>

    @endforeach

</ul>
