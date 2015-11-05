#ifndef CHOSTEL_HPP__
#define CHOSTEL_HPP__

#include "CHostel.hpp"
#include "CRoom.hpp"
#include "CProperty.hpp"
#include <iostream>

#include <vector>

using namespace std;

class CHostel : public CProperty 
{
public:
	int mRoomCount;	
	string mHostelName;
	vector<CRoom> mRooms;
};

#endif
