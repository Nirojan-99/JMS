@extends('Admin.layout.layout')
@section('title','Repair Requests')
@section('main-content')

<div class="container mb-5">
    <div class="container mt-3 fs-base fw-bold mb-5">
        <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">Repair Requests</li>
            </ol>
        </nav>
    </div>

    <!-- Repair Requests Table -->
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Request ID</th>
                        <th>Product</th>
                        <th>User</th>
                        <th>Repair Issue</th>
                        <th>Repair Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @for($i=0;$i < 3;$i++)
                        <tr>
                            <td><a class="fw-semibold" style="color: blue;" href="">1</a></td>
                            <td><a class="fw-semibold" style="color: blue;" href="">Gold Necklace</a></td>
                            <td>John Doe</td>
                            <td>
                                <ul>
                                    <li>Broken chain link</li>
                                    <li>Scratches on gemstone</li>
                                    <li>Loose clasp</li>
                                </ul>
                            </td>
                            <td>{{ \Carbon\Carbon::now()->format('Y-m-d') }}</td>
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

    <!-- Pagination Section -->
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
        alert('Repair request ' + requestId + ' has been accepted.');
    }

    function handleDeny(requestId) {
        alert('Repair request ' + requestId + ' has been denied.');
    }
</script>
@endsection
