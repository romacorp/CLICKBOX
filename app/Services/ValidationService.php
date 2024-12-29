<?php

namespace App\Services;

class ValidationService
{
    public function validateCustomerSearch($identification)
    {
        return (bool) preg_match('/^[A-Z0-9]{' . IDENTIFICATION_MIN_LENGTH . ',' . IDENTIFICATION_MAX_LENGTH . '}$/', $identification);
    }

    public function validateRatingData($rating, $comment)
    {
        return [
            'isValid' => $this->isValidRating($rating) && $this->isValidComment($comment),
            'errors' => $this->getValidationErrors($rating, $comment)
        ];
    }

    private function isValidRating($rating)
    {
        return is_numeric($rating) && $rating >= RATING_MIN && $rating <= RATING_MAX;
    }

    private function isValidComment($comment)
    {
        $length = strlen(trim($comment));
        return empty($comment) || ($length >= COMMENT_MIN_LENGTH && $length <= COMMENT_MAX_LENGTH);
    }

    private function getValidationErrors($rating, $comment)
    {
        $errors = [];
        
        if (!$this->isValidRating($rating)) {
            $errors['rating'] = 'La calificación debe estar entre ' . RATING_MIN . ' y ' . RATING_MAX;
        }
        
        if (!$this->isValidComment($comment)) {
            $errors['comment'] = 'El comentario debe tener entre ' . COMMENT_MIN_LENGTH . ' y ' . COMMENT_MAX_LENGTH . ' caracteres';
        }
        
        return $errors;
    }
}