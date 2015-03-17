						<td><?php echo $search['FirstName'] . ' ' . $search['LastName']; ?></td>
						<td><?php echo $search['Gender']; ?></td>
						<td><?php echo $formatted_birth_date; ?></td> 
						<td><form action="edit_actor.php" method="get">
							<a href="edit_actor.php?actor_id=<?php echo $actor['ActorID']; ?>">Edit</a>
						</form></td>