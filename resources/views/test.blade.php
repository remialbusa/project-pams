<table border="1">
    <tr>
        <th>Name</th>
        <th>Student ID</th>
        <th>Submitted Form</th>
        <th>Payment</th>
        <th>Status</th>
        <th>Action</th>
    </tr>
            

    @foreach ($studentStatus as $student)
    <tr>
        <td>{{$student['student_id']}}</td>
        <td>{{$student['student_id']}}</td>
        <td>{{$student['submitted_form']}}</td>
        <td>{{$student['payment']}}</td>
        <td>{{$student['status']}}</td>
        <td>
            <a href="{{route('test-edit', $student->id)}}">Edit</a>
            {{-- <a href="{{route('test-edit', $student->id)}}">Delete</a> --}}
        </td>
    </tr>
    @endforeach                                     
</table>