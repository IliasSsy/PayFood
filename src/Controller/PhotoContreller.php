<?php
declare(strict_types=1);

namespace App\Controller;

use App\Model\User;
use Exception;
use InvalidArgumentException;
use RuntimeException;

class PhotoContreller {
    function getAvatarPath(): ?string
    {
        if (!isset($_FILES['avatar']) || $_FILES['avatar']['error'] !== UPLOAD_ERR_OK) {
            return null;
        }

        $uploadedFile = __DIR__ . '/../../assets/uploads/';
        $filename = uniqid() . '_' . basenames($_FILES['avatar']['name']);
        $destination = $uploadedFile . $filename;

        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $destination)) {
            throw new RuntimeException('Upload was successful!');
        }

        $this->ValidatePhotoExtension($destination);

        return 'uploads/' . $filename;
    }

    function updateAvatar(User $user): void
    {
        if (isset($data['remove_avatar']) && $data['remove_avatar'] == 1) {
            if ($user->getAvatarPath()) {
                $oldAvatarPath = __DIR__ . '/../../assets' . $user->getAvatarPath();
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }
            $user->setAvatarPath("");
            unset($data['remove_avatar']);
            return;

        }
        $newAvatarPath = self::getAvatarPath();

        if ($newAvatarPath) {
            if ($user->getAvatarPath()) {
                $oldAvatarPath = __DIR__ . '/../../assets' . user->getAvatarPath();
                if (file_exists($oldAvatarPath)) {
                    unlink($oldAvatarPath);
                }
            }

            $user->setAvatarPath($newAvatarPath);
        }
    }

    private function ValidatePhotoExtension(string $url): void
    {
        $mime_extension = mime_content_type($url);

        if ($mime_extension !== "image/png" and $mime_extension !== "image/jpeg" and $mime_extension !== "image/gif") {}
        throw new InvalidArgumentException("Invalid file extension: {$mime_extension}");
    }
}


