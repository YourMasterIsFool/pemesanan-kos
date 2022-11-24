<!DOCTYPE html>
<html>

<head>

    <style lang="css">
        .header {
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
        }

        .date-header {
            display: flex;
            flex-direction: column;
            align-items: start;
            justify-content: start;
        }

        .title {
            font-size: 24;
            font-weight: 600;
            margin-bottom: 16px;
        }

        p {
            margin: 0;
        }

        table {
            width: 100%;
        }

        table thead {
            background-color: black;
        }

        table thead th {
            color: white;
            padding: 16px;
            text-align: left;
        }

        table tbody {
            background-color: transparent;

        }

        table tbody td {
            padding: 16px;
        }

        table tbody tr:nth-child(odd) {
            background-color: white;
            color: black;
        }

        table tbody tr:nth-child(even) {
            background-color: #eee;
            color: black;
        }
    </style>
    <!-- <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title> -->
    <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
</head>

<body>

    <div>
        <div class="header" style="padding: 0px 24px;">
            <h1 class="title">
                Laporan Catatan
            </h1>

            <div class="date-header">
                <p style="font-size: 14px;">
                    Tanggal:
                </p>
                <p style="font-weight:bold; font-size: 18px; margin-top: 9px;">
                    <span>
                        {{$startMonth}}
                    </span>
                    <span>-</span>
                    <span>
                        {{$endMonth}}
                    </span>
                </p>
            </div>
        </div>
        <div style="border: 2px solid lightgrey; width: 100%; margin:16px 0px">

        </div>
        <div class="body" style="padding: 0px 24px ;">
            <table>
                <thead>
                    <th>
                        No
                    </th>
                    <th>Nama</th>
                    <th>
                        Nomor Kamar
                    </th>
                    <th>
                        Bulan
                    </th>
                    <th>
                        Jumlah
                    </th>
                </thead>
                <tbody>

                    @php $i = 1; @endphp
                    @foreach($listCatatan as $catatan)
                    <tr>
                        <td>
                            {{$i++}}
                        </td>
                        <td>
                            {{$catatan->nama}}
                        </td>
                        <td>
                            {{$catatan->nomor_kamar}}
                        </td>
                        <td>
                        <td>{{ date('F Y', strtotime($item->bulan)) }}</td>

                        </td>
                        <td>
                            Rp. {{$catatan->jumlah}}
                        </td>
                    </tr>

                    @endforeach

                    <tr style="background-color: black; color: white">
                        <td colspan="4">
                            Total
                        </td>
                        <td>
                            Rp. {{$totalPendapatan}}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

</body>

</html>