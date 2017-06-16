<?php

namespace MicroCMS\DAO;

use MicroCMS\Domain\Comment;

class ParentDAO extends DAO 
{

    /**
     * @var \MicroCMS\DAO\ArticleDAO
     */
    private $articleDAO;

    /**
     * @var \MicroCMS\DAO\UserDAO
     */
    private $userDAO;

    public function setArticleDAO(ArticleDAO $articleDAO) {
        $this->articleDAO = $articleDAO;
    }

    public function setUserDAO(UserDAO $userDAO) {
        $this->userDAO = $userDAO;
    }

    /**
     * Returns a comment matching the supplied id.
     *
     * @param integer $id The comment id
     *
     * @return \MicroCMS\Domain\Comment|throws an exception if no matching comment is found
     */
    public function find($id) {
        $sql = "select * from t_comment where com_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        
        if (isset($id)) {
            if ($row) {
                return $this->buildDomainObject($row);
            }
            else {
                throw new \Exception("No comment matching id " . $id);
            }
        }
    }

    /**
     * Creates an Comment object based on a DB row.
     *
     * @param array $row The DB row containing Comment data.
     * @return \MicroCMS\Domain\Comment
     */
    protected function buildDomainObject(array $row) {
        $parent = new Comment();
        $parent->setId($row['com_id']);
        $parent->setContent($row['com_content']);

        return $parent;
    }
}