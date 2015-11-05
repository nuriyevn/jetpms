#include <iostream>
#include <cstring>
#include "CHostel.hpp"
#include "CRoom.hpp"

using namespace std;

int main()
{
	CHostel hostel;
	cout << "Please input hostel name:" << endl;
	cin >> hostel.mHostelName;
	
	cout << "Number of rooms in hostel:" << endl;
	cin >> hostel.mRoomCount;

		
	for (int i = 0; i < hostel.mRoomCount; i++)
	{
		cout << "Input name of " << i + 1 << "-th room:" << endl;
		CRoom temp_room;
		
		cin >> temp_room.mRoomName;
		cout << "Input count of beds in this room:" << endl;
		cin >> temp_room.mBedCount;		
		hostel.mRooms.push_back(temp_room);	   
	}	
	
	cout << "So far you have created for hostel: \'" << hostel.mHostelName << "\' following rooms: " << endl;


	for (int i = 0; i < hostel.mRooms.size(); i++)
	{	
		cout << i + 1 <<  "-th name: " << hostel.mRooms[i].mRoomName << "; beds count: "
			 << hostel.mRooms[i].mBedCount << endl; 
	}
	return 0;
}

