@extends('Admin.layout.layout')
@section('title','')
@section('main-content')

<div class="container mb-5">
    <div class="container mt-3 fs-base fw-bold mb-5">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Customization Requests</li>
            </ol>
        </nav>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Product</th>
                        <th>User</th>
                        <th>Requested Customization</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i=0;$i < 3;$i++)
                        <tr>
                        <td>1</td>
                        <td><a class="fw-semibold" style="color: blue;" href="">Product Name</a></td>
                        <td>John Doe</td>
                        <td>
                            <ul>
                                <li>Request to change gemstone to Sapphire</li>
                                <li>Increase chain length by 2 inches</li>
                                <li>Add engravings</li>
                            </ul>
                        </td>
                        <td>
                            <button class="btn btn-primary fw-semibold btn-sm" onclick="handleAccept(1)">Accept</button>
                            <button class="btn btn-danger fw-semibold btn-sm" onclick="handleDeny(1)">Deny</button>
                        </td>
                        </tr>
                        @endfor

                </tbody>
            </table>
        </div>
    </div>


    <div class="container mt-5 mb-3">
        <nav class="d-flex flex-row justify-content-center">
            <ul class="pagination flx-grow-1">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                @for ($i = 1; $i < 6; $i++)
                    <li class="page-item"><a class="page-link" href="">{{$i}}</a></li>
                    @endfor
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
            </ul>
        </nav>
    </div>

</div>

@endsection

@section('scripts')
<script>
    function handleAccept(requestId) {

    }

    function handleDeny(requestId) {

    }
</script>
@endsection