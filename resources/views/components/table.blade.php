	<table>
        <thead>
            <tr>
                <th>No</th>
                <th>Status</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @if($books->isEmpty())
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>-</td>
            </tr>
            @else
             @foreach($books as $index => $book)
            <tr>
              
                <td>{{ $index + 1 }}.</td>
                <td>
                	@if($book->status == 1)
                	<div class="up"><i class="ph-fill ph-caret-up"></i></div>
                	@else
                	<div class="down"><i class="ph-fill ph-caret-down"></i></div>
                	@endif
                </td>
                <td>Rp{{ number_format($book->amount, 0, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($book->created_at)->format('M j') }}</td>
                
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>