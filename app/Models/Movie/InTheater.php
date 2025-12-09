<?php

namespace App\Models\Movie;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Request;

class InTheater extends Model
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

    public static function with($relations)
    {
        return new static;
    }

    public function findOrFail($id)
    {
        // 使用本地mock数据替代豆瓣API
        $mockMovies = $this->getMockMovies();
        $movie = collect($mockMovies)->firstWhere('id', $id);

        if (!$movie) {
            abort(404, 'Movie not found');
        }

        return static::newFromBuilder($movie);
    }

    public function save(array $options = [])
    {
        dd($this->getAttributes());
    }

    /**
     * 获取本地mock电影数据
     */
    private function getMockMovies()
    {
        return [
            [
                'id' => '35190584',
                'title' => '流浪地球2',
                'original_title' => 'The Wandering Earth II',
                'year' => '2023',
                'images' => [
                    'small' => 'https://img1.doubanio.com/view/photo/s_ratio_poster/public/p2857777683.webp',
                    'large' => 'https://img1.doubanio.com/view/photo/s_ratio_poster/public/p2857777683.webp',
                    'medium' => 'https://img1.doubanio.com/view/photo/s_ratio_poster/public/p2857777683.webp'
                ],
                'directors' => [
                    ['id' => '1333647', 'name' => '郭帆']
                ],
                'castList' => [
                    ['id' => '1054395', 'name' => '吴京'],
                    ['id' => '1275045', 'name' => '刘德华'],
                    ['id' => '1308794', 'name' => '李雪健']
                ],
                'genres' => ['科幻', '冒险', '灾难'],
                'rating' => ['average' => 8.3]
            ],
            [
                'id' => '35414154',
                'title' => '满江红',
                'original_title' => 'Full River Red',
                'year' => '2023',
                'images' => [
                    'small' => 'https://img2.doubanio.com/view/photo/s_ratio_poster/public/p2854075429.webp',
                    'large' => 'https://img2.doubanio.com/view/photo/s_ratio_poster/public/p2854075429.webp',
                    'medium' => 'https://img2.doubanio.com/view/photo/s_ratio_poster/public/p2854075429.webp'
                ],
                'directors' => [
                    ['id' => '1047973', 'name' => '张艺谋']
                ],
                'castList' => [
                    ['id' => '1275045', 'name' => '沈腾'],
                    ['id' => '1316470', 'name' => '易烊千玺'],
                    ['id' => '1274672', 'name' => '张译']
                ],
                'genres' => ['剧情', '喜剧', '悬疑'],
                'rating' => ['average' => 7.8]
            ],
            [
                'id' => '36094743',
                'title' => '无名',
                'original_title' => 'Hidden Blade',
                'year' => '2023',
                'images' => [
                    'small' => 'https://img9.doubanio.com/view/photo/s_ratio_poster/public/p2856770614.webp',
                    'large' => 'https://img9.doubanio.com/view/photo/s_ratio_poster/public/p2856770614.webp',
                    'medium' => 'https://img9.doubanio.com/view/photo/s_ratio_poster/public/p2856770614.webp'
                ],
                'directors' => [
                    ['id' => '1313846', 'name' => '程耳']
                ],
                'castList' => [
                    ['id' => '1274672', 'name' => '梁朝伟'],
                    ['id' => '1316470', 'name' => '王一博'],
                    ['id' => '1054488', 'name' => '周迅']
                ],
                'genres' => ['剧情', '悬疑', '历史'],
                'rating' => ['average' => 6.7]
            ]
        ];
    }
}
