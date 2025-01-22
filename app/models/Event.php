<?php
// app/models/Event.php

class Event extends Model
{
    /**
     * Get all events.
     *
     * @return array An array of events.
     */
    public function getAllEvents()
    {
        $sql = 'SELECT * FROM events';
        return $this->query($sql);
    }

    /**
     * Get a single event by ID.
     *
     * @param int $id The event ID.
     * @return array|null The event data as an associative array, or null if not found.
     */
    public function getEventById($id)
    {
        $sql = 'SELECT * FROM events WHERE id = :id';
        return $this->fetch($sql, ['id' => $id]);
    }

    /**
     * Create a new event.
     *
     * @param string $name The event name.
     * @param string $description The event description.
     * @param string $date The event date.
     * @param string $location The event location.
     * @param int $capacity The event capacity.
     * @param int $createdBy The ID of the user who created the event.
     * @return bool True if the event was created successfully, false otherwise.
     */
    public function createEvent($name, $description, $date, $location, $capacity, $createdBy)
    {
        $sql = 'INSERT INTO events (name, description, date, location, capacity, created_by) 
                VALUES (:name, :description, :date, :location, :capacity, :created_by)';
        return $this->execute($sql, [
            'name' => $name,
            'description' => $description,
            'date' => $date,
            'location' => $location,
            'capacity' => $capacity,
            'created_by' => $createdBy,
        ]);
    }

    /**
     * Update an existing event.
     *
     * @param int $id The event ID.
     * @param string $name The event name.
     * @param string $description The event description.
     * @param string $date The event date.
     * @param string $location The event location.
     * @param int $capacity The event capacity.
     * @return bool True if the event was updated successfully, false otherwise.
     */
    public function updateEvent($id, $name, $description, $date, $location, $capacity)
    {
        $sql = 'UPDATE events 
                SET name = :name, description = :description, date = :date, location = :location, capacity = :capacity 
                WHERE id = :id';
        return $this->execute($sql, [
            'id' => $id,
            'name' => $name,
            'description' => $description,
            'date' => $date,
            'location' => $location,
            'capacity' => $capacity,
        ]);
    }

    /**
     * Delete an event by ID.
     *
     * @param int $id The event ID.
     * @return bool True if the event was deleted successfully, false otherwise.
     */
    public function deleteEvent($id)
    {
        $sql = 'DELETE FROM events WHERE id = :id';
        return $this->execute($sql, ['id' => $id]);
    }

    /**
     * Get events created by a specific user.
     *
     * @param int $userId The ID of the user.
     * @return array An array of events created by the user.
     */
    public function getEventsByUser($userId)
    {
        $sql = 'SELECT * FROM events WHERE created_by = :user_id';
        return $this->query($sql, ['user_id' => $userId]);
    }
}
?>