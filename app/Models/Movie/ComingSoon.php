<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Request;

class ComingSoon extends Model
{
    public function paginate()
    {
        $perPage = Request::get('per_page', 10);
        $page = Request::get('page', 1);
        $start = ($page - 1) * $perPage;

        // 使用本地mock数据替代豆瓣API
        $mockMovies = $this->getMockMovies();

        // 计算分页
        $total = count($mockMovies);
        $subjects = array_slice($mockMovies, $start, $perPage);

        $movies = static::hydrate($subjects);
        $paginator = new LengthAwarePaginator($movies, $total, $perPage);
        $paginator->setPath(url()->current());

        return $paginator;
    }

    /**
     * 获取本地mock电影数据
     */
    private function getMockMovies()
    {
        return [
            [
                'id' => '35591417',
                'title' => '长空之王',
                'original_title' => 'Born to Fly',
                'year' => '2023',
                'images' => [
                    'small' => 'https://img1.doubanio.com/view/photo/s_ratio_poster/public/p2857770614.webp',
                    'large' => 'https://img1.doubanio.com/view/photo/s_ratio_poster/public/p2857770614.webp',
                    'medium' => 'https://img1.doubanio.com/view/photo/s_ratio_poster/public/p2857770614.webp'
                ],
                'directors' => [
                    ['id' => '1316470', 'name' => '刘晓世']
                ],
                'casts' => [
                    ['id' => '1316470', 'name' => '王一博'],
                    ['id' => '1274672', 'name' => '胡军'],
                    ['id' => '1313846', 'name' => '周冬雨']
                ],
                'castList' => ['剧情', '动作'],
                'rating' => ['average' => 7.2]
            ],
            [
                'id' => '36094743',
                'title' => '消失的她',
                'original_title' => 'Lost in the Stars',
                'year' => '2023',
                'images' => [
                    'small' => 'https://img2.doubanio.com/view/photo/s_ratio_poster/public/p2856770614.webp',
                    'large' => 'https://img2.doubanio.com/view/photo/s_ratio_poster/public/p2856770614.webp',
                    'medium' => 'https://img2.doubanio.com/view/photo/s_ratio_poster/public/p2856770614.webp'
                ],
                'directors' => [
                    ['id' => '1313846', 'name' => '崔睿']
                ],
                'casts' => [
                    ['id' => '1316470', 'name' => '朱一龙'],
                    ['id' => '1313846', 'name' => '倪妮'],
                    ['id' => '1316470', 'name' => '文咏珊']
                ],
                'castList' => ['剧情', '悬疑', '犯罪'],
                'rating' => ['average' => 7.4]
            ],
            [
                'id' => '35190584',
                'title' => '封神第一部',
                'original_title' => 'Creation of the Gods I: Kingdom of Storms',
                'year' => '2023',
                'images' => [
                    'small' => 'https://img9.doubanio.com/view/photo/s_ratio_poster/public/p2854075429.webp',
                    'large' => 'https://img9.doubanio.com/view/photo/s_ratio_poster/public/p2854075429.webp',
                    'medium' => 'https://img9.doubanio.com/view/photo/s_ratio_poster/public/p2854075429.webp'
                ],
                'directors' => [
                    ['id' => '1047973', 'name' => '乌尔善']
                ],
                'castList' => [
                    ['id' => '1275045', 'name' => '费翔'],
                    ['id' => '1313846', 'name' => '李雪健'],
                    ['id' => '1316470', 'name' => '黄渤']
                ],
                'genres' => ['剧情', '奇幻', '古装'],
                'rating' => ['average' => 7.8]
            ]
        ];
    }
}
