@extends('layouts.dashboard')

@section('page-title', 'Manage Employees')

@section('content')
<div class="card">
    <div class="card-header">
        <h2 class="card-title">All Employees</h2>
        <a href="{{ route('admin.employees.create') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus"></i> Add Employee
        </a>
    </div>

    <div class="table-responsive">
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Employee Info</th>
                    <th>Status</th>
                    <th>Created Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>#{{ $employee->id }}</td>
                        <td>
                            <strong>{{ $employee->name }}</strong><br>
                            <small>{{ $employee->email }}</small>
                        </td>
                        <td>
                            <span class="badge {{ $employee->is_active ? 'badge-active' : 'badge-inactive' }}">
                                {{ $employee->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $employee->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="action-btns">
                                <a href="{{ route('admin.employees.show', $employee) }}" class="btn btn-info btn-sm" title="View">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.employees.edit', $employee) }}" class="btn btn-warning btn-sm" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.employees.destroy', $employee) }}" method="POST" style="display: inline;" onsubmit="return confirm('Deactivate this employee?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Deactivate">
                                        <i class="fas fa-user-slash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection