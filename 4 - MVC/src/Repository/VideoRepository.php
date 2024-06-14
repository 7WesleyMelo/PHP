<?php 

namespace Alura\Mvc\Repository;

use Alura\Mvc\Entity\Video;

use PDO;

class VideoRepository
{
    public function __construct(public PDO $pdo)
    {
        
    }

    public function add(Video $video): bool
    {
        $sql = "Insert into videos (url, title) values(?, ?);";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $video->url, PDO::PARAM_STR);
        $statement->bindValue(2, $video->title, PDO::PARAM_STR);

        $result = $statement->execute();

        $id = $this->pdo->lastInsertId();

        $video->setId(intval($id));
        
        return $result;
    }

    public function remove(int $id): bool
    {
        $sql = "DELETE from videos where id = ?;";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id, PDO::PARAM_INT);
        return $statement->execute();

    }

    public function update(Video $video): bool
    {
        $sql = "UPDATE videos SET url = :url, title = :title where id = :id;";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(':url', $video->url, PDO::PARAM_STR);
        $statement->bindValue(':title', $video->title, PDO::PARAM_STR);
        $statement->bindValue(':id', $video->id, PDO::PARAM_INT);

        return $statement->execute();
    }

    /**
     * @return Video[] 
    */

    public function all(): array
    {   
        $videoList = $this->pdo
            ->query('SELECT * from videos order by id asc;')
            ->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            function (array $videoData){
                $video = new Video($videoData['url'], $videoData['title']);
                $video->setId($videoData['id']);

                return $video;
            }, 
            $videoList
        );
    }
}