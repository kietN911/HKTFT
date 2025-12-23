<?php

namespace Database\Seeders;

use App\Models\Movie;
use App\Models\Screening;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Hành Trình Đến Vì Sao',
                'description' => 'Bộ phim khoa học viễn tưởng theo chân thủy thủ Maximus vượt qua những vì sao.',
                'duration_minutes' => 124,
                'rating' => 'T13',
                'poster_url' => 'https://images.unsplash.com/photo-1462331940025-496dfbfc7564',
            ],
            [
                'title' => 'Đêm Nhạc Kịch',
                'description' => 'Câu chuyện lãng mạn giữa âm nhạc và tình yêu trên sân khấu thành phố.',
                'duration_minutes' => 102,
                'rating' => 'P',
                'poster_url' => 'https://images.unsplash.com/photo-1485846234645-a62644f84728',
            ],
            [
                'title' => 'Săn Lùng Bóng Đêm',
                'description' => 'Trinh thám gay cấn cùng đặc vụ Max trong đường đua với thời gian.',
                'duration_minutes' => 110,
                'rating' => 'T18',
                'poster_url' => 'https://images.unsplash.com/photo-1505685296765-3a2736de412f',
            ],
        ];

        foreach ($movies as $movieData) {
            $movie = Movie::create($movieData);

            foreach (range(0, 2) as $offset) {
                Screening::create([
                    'movie_id' => $movie->id,
                    'auditorium' => 'Phòng '.($offset + 1),
                    'start_time' => Carbon::now()->addDays($offset)->setTime(rand(10, 22), [0, 30][rand(0, 1)]),
                    'price' => rand(95000, 155000),
                ]);
            }
        }
    }
}
