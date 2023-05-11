<?php

namespace Filippi4\Wildberries;

class WildberriesFeedbacks extends WildberriesFeedbacksClient
{
    public function config(array $keys): WildberriesFeedbacks
    {
        $this->validateKeys($keys);

        $this->config = $keys;

        return $this;
    }

    /**
     *
     * Получение списка родительских категорий товаров, которые есть у продавца
     *
     * @return mixed
     */
    public function getFeedbacksParentSubjects(): mixed
    {
        return (new WildberriesData($this->getResponse('api/v1/parent-subjects')))->data;
    }

    /**
     *
     * Получение списка родительских категорий товаров, которые есть у продавца
     *
     * @return mixed
     */
    public function getFeedbacksProductsRating(int $subjectId): mixed
    {
        return (new WildberriesData($this->getResponse('api/v1/feedbacks/products/rating', compact('subjectId'))))->data;
    }

    /**
     *
     * Получение списка из двух товаров, с наибольшей и наименьшей средней оценкой, по родительской категории
     *
     * @return mixed
     */
    public function getFeedbacksProductsRatingTop($subjectId): mixed
    {
        return (new WildberriesData($this->getResponse('api/v1/feedbacks/products/rating/top', compact('subjectId'))))->data;
    }

    /**
     *
     * Получение средней оценки товара по его nmId
     *
     * @return mixed
     */
    public function getFeedbacksProductsRatingNmid(int $nmId): mixed
    {
        return (new WildberriesData($this->getResponse('api/v1/feedbacks/products/rating/nmid', compact('nmId'))))->data;
    }

    /**
     *
     * Получение списка отзывов по заданным параметрам с пагинацией и сортировкой
     *
     * @return mixed
     */
    public function getFeedbacks(bool $isAnswered, bool $hasSupplierComplaint, int $nmId, int $take, int $skip, string $order): mixed
    {
        return (new WildberriesData($this->getResponse('api/v1/feedbacks', compact('isAnswered', 'hasSupplierComplaint', 'nmId', 'take', 'skip', 'order'))))->data;
    }
}