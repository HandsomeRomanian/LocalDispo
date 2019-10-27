<?php

class Classe {

    /** @var String $id */
    private $classID;
    private $startTime;
    private $endTime;
    private $dayID;
    private $roomID;
    private $teacher;
    private $teacherID;
    private $group;
    private $groupID;

    function __construct(int $classID, Time $startTime, Time $endTime, int $dayID, int $localID, int $teacherID, int $groupID) {
        $this->classID = $classID;
        $this->startTime = $startTime;
        $this->endTime = $endTime;
        $this->dayID = $dayID;
        $this->roomID = $localID;
        $this->teacherID = $teacherID;
        $this->groupID = $groupID;

    }

    // public int getDayOfWeek() {
    //     return dayID;
    // }

    // public LocalTime getStartTime() {
    //     return startTime.toLocalTime();
    // }

    // public LocalTime getEndTime() {
    //     return endTime.toLocalTime();
    // }

    // public Local getRoom() {
    //     Local out = DBService.getRoom(roomID);
    //     return out;
    // }

    // public Boolean ended() {
    //     LocalTime now = LocalDateTime.now().toLocalTime();
        
    //     if (now.compareTo(endTime.toLocalTime()) > 0){
    //         return true;
    //     }
    //     else {
    //         return false;
    //     }
    // }

    // public Boolean started() {
    //     LocalTime now = LocalDateTime.now().toLocalTime();
        
    //     if (now.compareTo(startTime.toLocalTime()) > 0){
    //         return true;
    //     }
    //     else {
    //         return false;
    //     }
    // }

    // public static Long timeBetween(Time end, Time start) {
    //     Duration dif = Duration.between(end.toLocalTime(), start.toLocalTime());
    //     return dif.toMinutes();
    // }

    // public static Long timeBetween(Classe first, Classe second) {
    //     Duration dif = Duration.between(first.endTime.toLocalTime(), second.startTime.toLocalTime());
    //     return dif.toMinutes();
    // }


    // public LocalTime timeUntil() {
    //     LocalTime now = LocalDateTime.now().toLocalTime();
    //     Duration dif = Duration.between(now, $this->startTime.toLocalTime());
    //     return LocalTime.ofNanoOfDay(dif.toNanos());
    // }

}

?>