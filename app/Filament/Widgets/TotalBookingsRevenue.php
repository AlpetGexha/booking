<?php

declare(strict_types=1);

namespace App\Filament\Widgets;

use App\Models\Booking;
use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;

final class TotalBookingsRevenue extends ChartWidget
{
    protected static ?string $heading = 'Total bookings revenue for the last 30 days';

    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {

        $data = Trend::model(Booking::class)
            ->between(
                start: now()->subMonth()->endOfDay(),
                end: now(),
            )
            ->perDay()
            ->sum('total_price');

        return [
            'datasets' => [
                [
                    'label' => 'Revenue',
                    'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    'backgroundColor' => 'rgba(11, 226, 4, 0.2)',
                    'borderColor' => 'rgb(11, 226, 4)',
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => $value->date),

        ];
    }

    protected function getType(): string
    {
        return 'line';
    }
}
