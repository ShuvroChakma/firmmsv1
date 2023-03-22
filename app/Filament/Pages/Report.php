<?php

namespace App\Filament\Pages;

use App\Models\Extras;
use App\Models\FeedingHistory;
use App\Models\Lot;
use App\Models\Sales;
use App\Models\VaccinationHistory;
use Filament\Pages\Page;
use Illuminate\Support\Facades\DB;

class Report extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.report';

    public $table = "";
    public $from = "";
    public $to = "";
    public $type = "";
    public $detail = "";

    public function mount()
    {
        $this->to = date("d/m/Y");
        $this->type = "all";
        $this->detail = "detailed";
    }

    public function report()
    {
        $this->table = "<style>
        table, td, th {
            border: 1px solid black;
            text-align:center;
          }
          thead th{
            text-transform:capitalize;
          }
          tfoot tr td {
            font-weight:bold;
          }
          </style>";
        if ($this->detail == "short") {
            $total = 0;
            if ($this->type == "all" || $this->type == "expenses") {
                $totalMedicine = VaccinationHistory::whereBetween("vaccination_histories.date", [$this->from, $this->to])
                    ->join("medicine_stock_histories", "vaccination_histories.medicine_id", "=", "medicine_stock_histories.medicine_id")
                    ->selectRaw("vaccination_histories.medicine_id,sum(vaccination_histories.quantity) as medicine_quantity,avg(price) as medicine_price")
                    ->groupBy("vaccination_histories.medicine_id")->get();
                $tfm = 0;
                foreach ($totalMedicine as $tf) {
                    $tfm += $tf->medicine_quantity * $tf->medicine_price;
                }


                $totalFood = FeedingHistory::whereBetween("feeding_histories.date", [$this->from, $this->to])
                    ->join("food_stock_histories", "feeding_histories.food_id", "=", "food_stock_histories.food_id")
                    ->selectRaw("feeding_histories.food_id,sum(feeding_histories.quantity) as food_quantity,avg(price) as food_price")
                    ->groupBy("feeding_histories.food_id")->get();



                $tfc = 0;
                foreach ($totalFood as $tf) {
                    $tfc += $tf->food_quantity * $tf->food_price;
                }

                $totalLot = Lot::whereBetween("date", [$this->from, $this->to])->select("price", "quantity_actual")->get();

                // dd($totalLot);
                $tfl = 0;
                foreach ($totalLot as $tf) {
                    $tfl += $tf->price * $tf->quantity_actual;
                }

                $totalEctra = Extras::whereBetween("date", [$this->from, $this->to])->sum("price");




                $this->table .= "<b>Expenses:</b> <br>";
                $this->table .= "Lot : " . ($tfl) . "<br>";
                $this->table .= "Food : " . ($tfc) . "<br>";
                $this->table .= "Medicine : " . ($tfm) . "<br>";
                $this->table .= "Extra : " . ($totalEctra) . "<br>";
                $total -= ($tfc + $tfm + $tfl + $totalEctra);
                // dd($this->table);
            }

            if ($this->type == "all" || $this->type == "gain") {
                $totalSell = Sales::whereBetween("date", [$this->from, $this->to])->select("price", "quantity")->get();
                $tfl = 0;
                // dd($to/talSell);
                foreach ($totalSell as $tf) {
                    $tfl += $tf->price * $tf->quantity;
                }
                $this->table .= "<b>Gain:</b> " . ($tfl) . "<br>";

                // dd($this->table);

                $total += $tfl;
            }

            if ($this->type == "all") $this->table .= "<b>Total:</b> " . ($total) . "<br>";
        } else {
            $totalE = 0;
            $totalG = 0;
            if ($this->type == "all" || $this->type == "expenses") {

                $this->table .= "<b>Expenses:</b><br/>";

                $totalMedicine = VaccinationHistory::whereBetween("vaccination_histories.date", [$this->from, $this->to])
                    ->join("medicine_stock_histories", "vaccination_histories.medicine_id", "=", "medicine_stock_histories.medicine_id")
                    ->join("medicines", "vaccination_histories.medicine_id", "=", "medicines.id")
                    ->selectRaw("vaccination_histories.medicine_id,medicines.name,sum(vaccination_histories.quantity) as medicine_quantity,avg(price) as medicine_price")
                    ->groupBy("vaccination_histories.medicine_id", "medicines.name")->get();

                $this->table .= "
                Medicine: <br>
                <table width='100%' border='1' style='border-collapse: collapse;border:1px solid #000'>
                <thead>
                <tr>
                <th>name</th>
                <th>quantity</th>
                <th>price</th>
                <th>total</th>
                </tr>
                </thead><tbody>
                ";
                $tfm = 0;
                foreach ($totalMedicine as $tf) {
                    $this->table .= "
                    <tr>
                    <td>" . $tf->name . "</td>
                    <td>" . $tf->medicine_quantity . "</td>
                    <td>" . $tf->medicine_price . "</td>
                    <td>" . $tf->medicine_quantity * $tf->medicine_price . "</td></tr>
                    ";
                    $tfm += $tf->medicine_quantity * $tf->medicine_price;
                }

                $this->table .= "</tbody>
                <tfoot><tr><td colspan='3'>Total</td><td>" . $tfm . "</td></tr></tfoot>
                </table>";
                $totalE += $tfm;

                $totalFood = FeedingHistory::whereBetween("feeding_histories.date", [$this->from, $this->to])
                    ->join("food_stock_histories", "feeding_histories.food_id", "=", "food_stock_histories.food_id")
                    ->join("food", "food.id", "=", "feeding_histories.food_id")
                    ->selectRaw("feeding_histories.food_id,food.name,sum(feeding_histories.quantity) as food_quantity,avg(price) as food_price")
                    ->groupBy("feeding_histories.food_id", "food.name")->get();



                $this->table .= "
                    Food: <br>
                    <table width='100%' border='1' style='border-collapse: collapse;border:1px solid #000'>
                    <thead>
                    <tr>
                    <th>name</th>
                    <th>quantity</th>
                    <th>price</th>
                    <th>total</th>
                    </tr>
                    </thead><tbody>
                    ";
                $tfm = 0;
                foreach ($totalFood as $tf) {
                    $this->table .= "
                        <tr>
                        <td>" . $tf->name . "</td>
                        <td>" . $tf->food_quantity . "</td>
                        <td>" . $tf->food_price . "</td>
                        <td>" . $tf->food_quantity * $tf->food_price . "</td></tr>
                        ";
                    $tfm += $tf->food_quantity * $tf->food_price;
                }

                $this->table .= "</tbody>
                    <tfoot><tr><td colspan='3'>Total</td><td>" . $tfm . "</td></tr></tfoot>
                    </table>";

                $totalE += $tfm;
                $totalLot = Lot::whereBetween("date", [$this->from, $this->to])->select("price", "name", "quantity_actual")->get();

                // dd($totalLot);
                $this->table .= "
                    Lot: <br>
                    <table width='100%' border='1' style='border-collapse: collapse;border:1px solid #000'>
                    <thead>
                    <tr>
                    <th>name</th>
                    <th>quantity</th>
                    <th>price</th>
                    <th>total</th>
                    </tr>
                    </thead><tbody>
                    ";
                $tfm = 0;
                foreach ($totalLot as $tf) {
                    $this->table .= "
                        <tr>
                        <td>" . $tf->name . "</td>
                        <td>" . $tf->quantity_actual . "</td>
                        <td>" . $tf->price . "</td>
                        <td>" . $tf->quantity_actual * $tf->price . "</td></tr>
                        ";
                    $tfm += $tf->quantity_actual * $tf->price;
                }

                $this->table .= "</tbody>
                    <tfoot><tr><td colspan='3'>Total</td><td>" . $tfm . "</td></tr></tfoot>
                    </table>";

                $totalE += $tfm;
                $totalExtra = Extras::whereBetween("date", [$this->from, $this->to])->select("types", "price")->get();

                $this->table .= "
                Extra: <br>
                <table width='100%' border='1' style='border-collapse: collapse;border:1px solid #000'>
                <thead>
                <tr>
                <th>name</th>
                <th>price</th>
                <th>total</th>
                </tr>
                </thead><tbody>
                ";
                $tfm = 0;
                foreach ($totalExtra as $tf) {
                    $this->table .= "
                    <tr>
                    <td>" . $tf->types . "</td>
                    <td>" . $tf->price . "</td>
                    <td>" . $tf->price . "</td></tr>
                    ";
                    $tfm +=  $tf->price;
                }

                $this->table .= "</tbody>
                <tfoot><tr><td colspan='2'>Total</td><td>" . $tfm . "</td></tr></tfoot>
                </table>";

                $totalE += $tfm;
                // dd($this->table);
            }

            if ($this->type == "all" || $this->type == "gain") {
                $this->table .= "<b>Gain:</b><br/>";
                $totalSell = Sales::whereBetween("sales.date", [$this->from, $this->to])
                    ->join("lots", "lots.id", "=", "sales.lot_id")
                    ->select("lots.name", "sales.price", "sales.quantity")->get();
                $this->table .= "
                    Sales: <br>
                    <table width='100%' border='1' style='border-collapse: collapse;border:1px solid #000'>
                    <thead>
                    <tr>
                    <th>name</th>
                    <th>quantity</th>
                    <th>price</th>
                    <th>total</th>
                    </tr>
                    </thead><tbody>
                    ";
                $tfm = 0;
                foreach ($totalSell as $tf) {
                    $this->table .= "
                        <tr>
                        <td>" . $tf->name . "</td>
                        <td>" . $tf->quantity . "</td>
                        <td>" . $tf->price . "</td>
                        <td>" . $tf->quantity * $tf->price . "</td></tr>
                        ";
                    $tfm += $tf->quantity * $tf->price;
                }

                $this->table .= "</tbody>
                    <tfoot><tr><td colspan='3'>Total</td><td>" . $tfm . "</td></tr></tfoot>
                    </table>";
                // dd($this->table);

                $totalG += $tfm;
            }

            if ($this->type == "all") $this->table .= "<b>Total:" . $totalG - $totalE . "</b> <br>Expenses:" . ($totalE) . "<br>Gain: " . $totalG;
        }
    }
}
