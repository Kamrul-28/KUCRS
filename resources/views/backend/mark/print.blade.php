<!DOCTYPE html>
<html lang="en">

<head>
    <title>Grade Sheet</title>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Siyam%20Rupali">

    <style>
        @page {
            size: A4;
            margin: 2cm;
            width: 210mm;
            height: 297mm;
        }

        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            table,
            th,
            td {
                border: 1px solid black;
                border-collapse: collapse;
                -webkit-transition: ;
                -moz-transition: ;
                -ms-transition: ;
                -o-transition: ;
            }

            img {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;
            }

            nav,
            footer,
            header {
                display: none;
            }

        }

        @font-face {
            font-family: 'Bangla';
            src: url('font/kalpurush_ANSI.ttf') format('truetype');
        }

        * {
            font-family: 'Bangla';
        }
    </style>

</head>

<body>


    <!-- content start -->
    <div>
        <div style="text-align: center;font-family:'Times New Roman', Times, serif">
            <h1> KHULNA UNIVERSITY </h1>
            <h3>BANGLADESH</h3><br>
            <img src="https://ku.ac.bd/frontend/images/logo.png" style="text-align: center;" height="120px" width="120px">
        </div>
        <div style="text-align: center;font-family:'Times New Roman', Times, serif">
            <b>
                <h1>GRADE SHEET</h1>
            </b>
        </div>
    </div>
    @foreach ($result as $item)
        <!-- header group  -->


        @if ($loop->iteration == 1)
            <div style="width: 100%;display:flex">
                <p >
                    <span style="flex: 30%"> Year: <span style="text-decoration: underline;">{{ $item->enrollment_year }}</span></span>

                    <span style="flex: 30%">Term: <span style="text-decoration: underline">{{ $item->enrollment_term }}</span></span>

                    <span style="flex: 30%">Session: <span style="text-decoration: underline">{{ $item->enrollment_session }}</span></span>
                </p>
            </div>
            <div style="width: 100%;display: flex">
                <p >
                    <span style="flex: 30%">Student No: <span style="text-decoration: underline">{{ $item->student_id }}</span></span>

                    <span style="flex: 30%">Student Name: <span style="text-decoration: underline">{{ $item->name }}</span></span>

                </p>
            </div>







            @foreach ($discipline as $dis)
                @if ($dis->id == $item->discipline_id)
                    Discipline: <span style="text-decoration: underline">{{ $dis->discipline_name }}</span>



                    Discipline: <span style="text-decoration: underline">{{ $dis->school_name }}</span>
                @endif
            @endforeach
        @endif
    @endforeach
    <table style="width: 100%;margin-top:30px">
        <th scope="col" style="text-align: left">Course No</th>
        <th scope="col" style="text-align: left">Course Title</th>
        <th scope="col" style="text-align: left">Credit Hours</th>
        <th scope="col" style="text-align: left">Letter Grade</th>
        <th scope="col" style="text-align: left">Grade Point</th>

        @foreach ($result as $item)
            <tr style="text-align: center">
                @foreach ($course as $cor)
                    @if ($cor->id == $item->course_id)
                        <td>{{ $cor->course_code }}</td>
                        <td>{{ $cor->course_title }}</td>
                        <td>{{ $cor->course_credit }}</td>
                    @endif
                @endforeach

                @if ($item->final_mark >= 80)
                    <td>A+</td>
                    <td>4.00</td>
                @elseif($item->final_mark >= 75)
                    <td>A</td>
                    <td>3.75</td>
                @elseif($item->final_mark >= 70)
                    <td>A-</td>
                    <td>3.50</td>
                @elseif($item->final_mark >= 65)
                    <td>B+</td>
                    <td>3.25</td>
                @elseif($item->final_mark >= 60)
                    <td>B</td>
                    <td>3.00</td>
                @elseif($item->final_mark >= 55)
                    <td>B-</td>
                    <td>2.75</td>
                @elseif($item->final_mark >= 50)
                    <td>C+</td>
                    <td>2.50</td>
                @elseif($item->final_mark >= 45)
                    <td>C</td>
                    <td>2.25</td>
                @elseif($item->final_mark >= 40)
                    <td>D</td>
                    <td>2.00</td>
                @else
                    <td>F</td>
                    <td>0.00</td>
                @endif
            </tr>
        @endforeach
    </table>




    <script src="https://cdn.jsdelivr.net/npm/jsbarcode@3.11.3/dist/jsbarcode.min.js"></script>


    <script>
        window.print();
    </script>

</body>

</html>
